<?php

namespace TelegramBotSDK\Api\Service;

use TelegramBotSDK\Exception;
use TelegramBotSDK\HttpException;
use TelegramBotSDK\InvalidArgumentException;
use TelegramBotSDK\InvalidJsonException;
use TelegramBotSDK\Types\ForceReply;
use TelegramBotSDK\Types\Game\ArrayOfGameHighScore;
use TelegramBotSDK\Types\Game\GameHighScore;
use TelegramBotSDK\Types\Inline\InlineKeyboardMarkup;
use TelegramBotSDK\Types\Message;
use TelegramBotSDK\Types\ReplyKeyboardMarkup;
use TelegramBotSDK\Types\ReplyKeyboardRemove;
use TelegramBotSDK\Types\ReplyParameters;

class GameService extends BaseService
{
    /**
     * Use this method to send a game.
     *
     * @see https://core.telegram.org/bots/api#sendgame
     *
     * @param int $chatId Unique identifier for the target chat
     * @param string $gameShortName Short name of the game, serves as the unique identifier for the game. Set up your
     *                              games via @BotFather.
     * @param bool $disableNotification Sends the message silently. Users will receive a notification with no sound.
     * @param bool $protectContent Protects the contents of the sent message from forwarding and saving
     * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum
     *                                  supergroups only
     * @param string|null $businessConnectionId Unique identifier of the business connection on behalf of which the
     *                                          message will be sent
     * @param string|null $messageEffectId Unique identifier of the message effect to be added to the message; for
     *                                     private chats only
     * @param ReplyParameters|null $replyParameters Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardRemove|ReplyKeyboardMarkup|ForceReply|null $replyMarkup AN object for
     *                                                                                                  an inline
     *                                                                                                  keyboard. If empty, one 'Play game_title' button will be shown. If not empty, the first button must launch
     *                                                                                                  the game.
     *
     * @return Message
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function sendGame(
        int $chatId,
        string $gameShortName,
        bool $disableNotification = false,
        bool $protectContent = false,
        ?int $messageThreadId = null,
        ?string $businessConnectionId = null,
        ?string $messageEffectId = null,
        ?ReplyParameters $replyParameters = null,
        InlineKeyboardMarkup|ReplyKeyboardRemove|ReplyKeyboardMarkup|ForceReply|null $replyMarkup = null,
    ): Message {
        return Message::fromResponse($this->call('sendGame', [
            'chat_id' => $chatId,
            'game_short_name' => $gameShortName,
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
     * Use this method to set the score of the specified user in a game message. On success, if the message is not an
     * inline message, the Message is returned, otherwise True is returned. Returns an error, if the new score is not
     * greater than the user's current score in the chat and force is False.
     *
     * @see https://core.telegram.org/bots/api#setgamescore
     *
     * @param int $userId User identifier
     * @param int $score New score, must be non-negative
     * @param bool $force Pass True if the high score is allowed to decrease. This can be useful when fixing mistakes
     *                    or banning cheaters
     * @param bool $disableEditMessage Pass True if the game message should not be automatically edited to include the
     *                                 current scoreboard
     * @param int|null $chatId Required if inline_message_id is not specified. Unique identifier for the target chat
     * @param int|null $messageId Required if inline_message_id is not specified. Identifier of the sent message
     * @param string|null $inlineMessageId Required if chat_id and message_id are not specified. Identifier of the
     *                                     inline message
     *
     * @return Message
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function setGameScore(
        int $userId,
        int $score,
        bool $force = false,
        bool $disableEditMessage = false,
        ?int $chatId = null,
        ?int $messageId = null,
        ?string $inlineMessageId = null,
    ): Message {
        return Message::fromResponse($this->call('setGameScore', [
            'user_id' => $userId,
            'score' => $score,
            'force' => $force,
            'disable_edit_message' => $disableEditMessage,
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'inline_message_id' => $inlineMessageId,
        ]));
    }

    /**
     * Use this method to get data for high score tables. Will return the score of the specified user and several of
     * their neighbors in a game. Returns an Array of GameHighScore objects.
     *
     * This method will currently return scores for the target user, plus two of their closest neighbors on each side.
     * Will also return the top three users if the user and their neighbors are not among them. Please note that this
     * behavior is subject to change.
     *
     * @see https://core.telegram.org/bots/api#setgamescore
     *
     * @param int $userId User identifier
     * @param int $score New score, must be non-negative
     * @param bool $force Pass True if the high score is allowed to decrease. This can be useful when fixing mistakes
     *                    or banning cheaters
     * @param bool $disableEditMessage Pass True if the game message should not be automatically edited to include the
     *                                 current scoreboard
     * @param int|null $chatId Required if inline_message_id is not specified. Unique identifier for the target chat
     * @param int|null $messageId Required if inline_message_id is not specified. Identifier of the sent message
     * @param string|null $inlineMessageId Required if chat_id and message_id are not specified. Identifier of the
     *                                     inline message
     *
     * @return GameHighScore[]
     * @throws Exception|HttpException|InvalidArgumentException|InvalidJsonException
     */
    public function getGameHighScores(
        int $userId,
        int $score,
        bool $force = false,
        bool $disableEditMessage = false,
        ?int $chatId = null,
        ?int $messageId = null,
        ?string $inlineMessageId = null,
    ): array {
        return ArrayOfGameHighScore::fromResponse($this->call('getGameHighScores', [
            'user_id' => $userId,
            'score' => $score,
            'force' => $force,
            'disable_edit_message' => $disableEditMessage,
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'inline_message_id' => $inlineMessageId,
        ]));
    }
}
