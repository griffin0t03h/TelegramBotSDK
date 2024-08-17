<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;

/**
 * Class CallbackQuery
 * This object represents an incoming callback query from a callback button in an inline keyboard.
 * If the button that originated the query was attached to a message sent by the bot,
 * the field message will be present.
 * If the button was attached to a message sent via the bot (in inline mode),
 * the field inline_message_id will be present.
 * Exactly one of the fields data or game_short_name will be present.
 *
 * @package TelegramBotSDK\Types
 */
class CallbackQuery extends BaseType
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['id', 'from'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'id' => true,
        'from' => User::class,
        'message' => MaybeInaccessibleMessage::class,
        'inline_message_id' => true,
        'chat_instance' => true,
        'data' => true,
        'game_short_name' => true,
    ];

    /**
     * Unique identifier for this query
     *
     * @var string
     */
    protected string $id;

    /**
     * Sender
     *
     * @var User
     */
    protected User $from;

    /**
     * Optional. Message with the callback button that originated the query.
     * Note that message content and message date will not be available
     * if the message is too old
     *
     * @var Message|InaccessibleMessage|null
     */
    protected InaccessibleMessage|Message|null $message = null;

    /**
     * Optional. Identifier of the message sent via the bot in inline mode,
     * that originated the query.
     *
     * @var string|null
     */
    protected ?string $inlineMessageId = null;

    /**
     * Global identifier, uniquely corresponding to the chat to which the message with the callback button was sent.
     * Useful for high scores in games.
     *
     * @var string|null
     */
    protected ?string $chatInstance = null;

    /**
     * Optional. Data associated with the callback button. Be aware that the message originated the query can contain
     * no callback buttons with this data.
     *
     * @var string|null
     */
    protected ?string $data = null;

    /**
     * Optional. Short name of a Game to be returned,
     * serves as the unique identifier for the game
     *
     * @var string|null
     */
    protected ?string $gameShortName = null;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return void
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * @param User $from
     * @return void
     */
    public function setFrom(User $from): void
    {
        $this->from = $from;
    }

    /**
     * @return Message|InaccessibleMessage|null
     */
    public function getMessage(): Message|InaccessibleMessage|null
    {
        return $this->message;
    }

    /**
     * @param InaccessibleMessage|Message|null $message
     * @return void
     */
    public function setMessage(Message|InaccessibleMessage|null $message): void
    {
        $this->message = $message;
    }

    /**
     * @return string|null
     */
    public function getInlineMessageId(): ?string
    {
        return $this->inlineMessageId;
    }

    /**
     * @param string|null $inlineMessageId
     * @return void
     */
    public function setInlineMessageId(?string $inlineMessageId): void
    {
        $this->inlineMessageId = $inlineMessageId;
    }

    /**
     * @return string|null
     */
    public function getChatInstance(): ?string
    {
        return $this->chatInstance;
    }

    /**
     * @param string|null $chatInstance
     * @return void
     */
    public function setChatInstance(?string $chatInstance): void
    {
        $this->chatInstance = $chatInstance;
    }

    /**
     * @return string|null
     */
    public function getData(): ?string
    {
        return $this->data;
    }

    /**
     * @param string|null $data
     * @return void
     */
    public function setData(?string $data): void
    {
        $this->data = $data;
    }

    /**
     * @return string|null
     */
    public function getGameShortName(): ?string
    {
        return $this->gameShortName;
    }

    /**
     * @param string|null $gameShortName
     * @return void
     */
    public function setGameShortName(?string $gameShortName): void
    {
        $this->gameShortName = $gameShortName;
    }
}
