<?php

namespace TelegramBotSDK\Api\Service;

use CURLFile;
use TelegramBotSDK\Enum\StickerFormat;
use TelegramBotSDK\Exception;
use TelegramBotSDK\HttpException;
use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\InvalidJsonException;
use TelegramBotSDK\Types\File;
use TelegramBotSDK\Types\ForceReply;
use TelegramBotSDK\Types\Inline\InlineKeyboardMarkup;
use TelegramBotSDK\Types\MaskPosition;
use TelegramBotSDK\Types\Message;
use TelegramBotSDK\Types\ReplyKeyboardMarkup;
use TelegramBotSDK\Types\ReplyKeyboardRemove;
use TelegramBotSDK\Types\ReplyParameters;
use TelegramBotSDK\Types\Sticker\StickerSet;

class StickerService extends BaseService
{
    /**
     * Use this method to send static .WEBP, animated .TGS, or video .WEBM stickers.
     * On success, the sent Message is returned.
     *
     * @see https://core.telegram.org/bots/api#sendsticker
     *
     * @param int|string $chatId chat_id or @channel_name
     * @param CURLFile|string $sticker Sticker to send. Pass a file_id as String to send a file that exists on the
     *                                 Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get
     *                                 a .WEBP sticker from the Internet, or upload a new .WEBP, .TGS, or .WEBM sticker using multipart/form-data.
     *                                 Video and animated stickers can't be sent via an HTTP URL.
     * @param bool $disableNotification Sends the message silently. Users will receive a notification with no sound.
     * @param bool $protectContent Protects the contents of the sent message from forwarding and saving
     * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum
     *                                  supergroups only
     * @param string|null $businessConnectionId Unique identifier of the business connection on behalf of which the
     *                                          message will be sent
     * @param string|null $messageEffectId Unique identifier of the message effect to be added to the message; for
     *                                     private chats only
     * @param string|null $emoji Emoji associated with the sticker; only for just uploaded stickers
     * @param ReplyParameters|null $replyParameters Description of the message to reply to
     * @param ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $replyMarkup Additional
     *                                                                                                  interface
     *                                                                                                  options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a
     *                                                                                                  reply keyboard or to force a reply from the user
     *
     * @return Message
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function sendSticker(
        int|string $chatId,
        CURLFile|string $sticker,
        bool $disableNotification = false,
        bool $protectContent = false,
        ?int $messageThreadId = null,
        ?string $businessConnectionId = null,
        ?string $messageEffectId = null,
        ?string $emoji = null,
        ?ReplyParameters $replyParameters = null,
        InlineKeyboardMarkup|ReplyKeyboardRemove|ReplyKeyboardMarkup|ForceReply $replyMarkup = null,
    ): Message {
        return Message::fromResponse($this->call('sendSticker', [
            'chat_id' => $chatId,
            'sticker' => $sticker,
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
     * Use this method to get a sticker set.
     *
     * @see https://core.telegram.org/bots/api#getstickerset
     *
     * @param string $name Name of the sticker set
     *
     * @return StickerSet
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function getStickerSet(string $name): StickerSet
    {
        return StickerSet::fromResponse(
            $this->call('getStickerSet', [
                'name' => $name,
            ]),
        );
    }

    /**
     * Use this method to get information about custom emoji stickers by their identifiers.
     *
     * @see https://core.telegram.org/bots/api#getcustomemojistickers
     *
     * @param array[] $customEmojiIds List of custom emoji identifiers.
     *                                At most 200 custom emoji identifiers can be specified.
     *
     * @return StickerSet
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function getCustomEmojiStickers(array $customEmojiIds = []): StickerSet
    {
        return StickerSet::fromResponse($this->call('getCustomEmojiStickers', [
            'custom_emoji_ids' => json_encode($customEmojiIds),
        ]));
    }

    /**
     * Use this method to upload a file with a sticker for later use in the createNewStickerSet, addStickerToSet, or
     * replaceStickerInSet methods (the file can be used multiple times).
     *
     * @see https://core.telegram.org/bots/api#uploadstickerfile
     *
     * @param int $userId User identifier of sticker file owner
     * @param CURLFile $sticker A file with the sticker in .WEBP, .PNG, .TGS, or .WEBM format. See
     *                          https://core.telegram.org/stickers for technical requirements.
     * @param StickerFormat $stickerFormat Format of the sticker, must be one of “static”, “animated”, “video”
     *
     * @return File
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function uploadStickerFile(
        int $userId,
        CURLFile $sticker,
        StickerFormat $stickerFormat,
    ): File {
        return File::fromResponse($this->call('uploadStickerFile', [
            'user_id' => $userId,
            'sticker' => $sticker,
            'sticker_format' => $stickerFormat->value,
        ]));
    }

    /**
     * Use this method to move a sticker in a set created by the bot to a specific position.
     *
     * @see https://core.telegram.org/bots/api#setstickerpositioninset
     *
     * @param string $sticker File identifier of the sticker
     * @param int $position New sticker position in the set, zero-based
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function setStickerPositionInSet(string $sticker, int $position): bool
    {
        return $this->call('setStickerPositionInSet', [
            'sticker' => $sticker,
            'position' => $position,
        ]);
    }

    /**
     * Use this method to delete a sticker from a set created by the bot.
     *
     * @see https://core.telegram.org/bots/api#deletestickerfromset
     *
     * @param string $sticker File identifier of the sticker
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function deleteStickerFromSet(string $sticker): bool
    {
        return $this->call('deleteStickerFromSet', [
            'sticker' => $sticker,
        ]);
    }

    /**
     * Use this method to change the list of emoji assigned to a regular or custom emoji sticker. The sticker must
     * belong to a sticker set created by the bot.
     *
     * @see https://core.telegram.org/bots/api#setstickeremojilist
     *
     * @param string $sticker File identifier of the sticker
     * @param string[] $emojiList list of 1-20 emoji associated with the sticker
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function setStickerEmojiList(string $sticker, array $emojiList): bool
    {
        return $this->call('setStickerEmojiList', [
            'sticker' => $sticker,
            'emoji_list' => json_encode($emojiList),
        ]);
    }

    /**
     * Use this method to change search keywords assigned to a regular or custom emoji sticker. The sticker must belong
     * to a sticker set created by the bot.
     *
     * @see https://core.telegram.org/bots/api#setstickerkeywords
     *
     * @param string $sticker File identifier of the sticker
     * @param string[] $keywords list of 0-20 search keywords for the sticker with total length of up to 64 characters
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function setStickerKeywords(string $sticker, array $keywords): bool
    {
        return $this->call('setStickerKeywords', [
            'sticker' => $sticker,
            'keywords' => json_encode($keywords),
        ]);
    }

    /**
     * Use this method to change the mask position of a mask sticker. The sticker must belong to a sticker set that was
     * created by the bot.
     *
     * @see https://core.telegram.org/bots/api#setstickermaskposition
     *
     * @param string $sticker File identifier of the sticker
     * @param MaskPosition|null $maskPosition object with the position where the mask should be placed on faces. Omit
     *                                        the parameter to remove the mask position.
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function setStickerMaskPosition(string $sticker, ?MaskPosition $maskPosition): bool
    {
        return $this->call('setStickerMaskPosition', [
            'sticker' => $sticker,
            'mask_position' => $maskPosition?->toJson(),
        ]);
    }

    /**
     * Use this method to set the title of a created sticker set.
     *
     * @see https://core.telegram.org/bots/api#setstickersettitle
     *
     * @param string $name Sticker set name
     * @param string $title Sticker set title, 1-64 characters
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function setStickerSetTitle(string $name, string $title): bool
    {
        return $this->call('setStickerSetTitle', [
            'name' => $name,
            'title' => $title,
        ]);
    }

    /**
     * Use this method to set the thumbnail of a regular or mask sticker set. The format of the thumbnail file must
     * match the format of the stickers in the set.
     *
     * @see https://core.telegram.org/bots/api#setstickersetthumbnail
     *
     * @param string $name Sticker set name
     * @param string $userId User identifier of sticker set owner
     * @param StickerFormat $format Format of the thumbnail, must be one of “static” for a .WEBP or .PNG image,
     *                              “animated” for a .TGS animation, or “video” for a WEBM video
     * @param CURLFile|string|null $thumbnail A .WEBP or .PNG image with the thumbnail, must be up to 128 kilobytes in
     *                                        size and have a width and height of exactly 100px, or a .TGS animation
     *                                        with a thumbnail up to 32 kilobytes in size
     *                                        (see https://core.telegram.org/stickers#animation-requirements for
     *                                        animated sticker technical requirements), or a WEBM video with the thumbnail up to 32 kilobytes in size; see
     *                                        https://core.telegram.org/stickers#video-requirements for video sticker technical requirements. Pass a
     *                                        file_id as a String to send a file that already exists on the Telegram servers, pass an HTTP URL as a String
     *                                        for Telegram to get a file from the Internet, or upload a new one using multipart/form-data. More
     *                                        information on Sending Files ». Animated and video sticker set thumbnails can't be uploaded via HTTP URL. If
     *                                        omitted, then the thumbnail is dropped and the first sticker is used as the thumbnail.
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function setStickerSetThumbnail(
        string $name,
        string $userId,
        StickerFormat $format,
        CURLFile|string $thumbnail = null,
    ): bool {
        return $this->call('setStickerSetThumbnail', [
            'name' => $name,
            'user_id' => $userId,
            'format' => $format->value,
            'thumbnail' => $thumbnail,
        ]);
    }

    /**
     * Use this method to set the thumbnail of a custom emoji sticker set.
     *
     * @see https://core.telegram.org/bots/api#setcustomemojistickersetthumbnail
     *
     * @param string $name Sticker set name
     * @param string $customEmojiId Custom emoji identifier of a sticker from the sticker set; pass an empty string to
     *                              drop the thumbnail and use the first sticker as the thumbnail.
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function setCustomEmojiStickerSetThumbnail(string $name, string $customEmojiId): bool
    {
        return $this->call('setCustomEmojiStickerSetThumbnail', [
            'name' => $name,
            'custom_emoji_id' => $customEmojiId,
        ]);
    }

    /**
     * Use this method to delete a sticker set that was created by the bot.
     *
     * @see https://core.telegram.org/bots/api#deletestickerset
     *
     * @param string $name Sticker set name
     *
     * @return bool
     * @throws Exception|HttpException|InvalidJsonException
     */
    public function deleteStickerSet(string $name): bool
    {
        return $this->call('deleteStickerSet', [
            'name' => $name,
        ]);
    }
}
