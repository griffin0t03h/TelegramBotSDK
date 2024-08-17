<?php

namespace TelegramBotSDK\Types;

/**
 * Class InaccessibleMessage
 * This object describes a message that was deleted or is otherwise inaccessible to the bot.
 *
 * @package TelegramBotSDK\Types
 */
class InaccessibleMessage extends MaybeInaccessibleMessage
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['chat', 'message_id', 'date'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'chat' => Chat::class,
        'message_id' => true,
        'date' => true,
    ];

    /**
     * Chat the message belonged to
     *
     * @var Chat
     */
    protected Chat $chat;

    /**
     * Unique message identifier inside the chat
     *
     * @var int
     */
    protected int $messageId;

    /**
     * Always 0. The field can be used to differentiate regular and inaccessible messages.
     *
     * @var int
     */
    protected int $date;

    public static function fromResponse(array $data): Message|MaybeInaccessibleMessage|InaccessibleMessage|static
    {
        self::validate($data);
        /** @psalm-suppress UnsafeInstantiation */
        $instance = new static();
        $instance->map($data);

        return $instance;
    }

    /**
     * @return Chat
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
}
