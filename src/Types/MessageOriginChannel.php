<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\Enum\MessageOriginType;

/**
 * Class MessageOriginChannel
 * The message was originally sent to a channel chat.
 *
 * @package TelegramBotSDK\Types
 */
class MessageOriginChannel extends MessageOrigin
{
    protected static array $requiredParams = ['type', 'date', 'chat', 'message_id'];

    protected static array $map = [
        'type' => true,
        'date' => true,
        'chat' => Chat::class,
        'message_id' => true,
        'author_signature' => true,
    ];

    /**
     * {@inheritdoc}
     *
     * @var MessageOriginType
     */
    protected MessageOriginType $type = MessageOriginType::Channel;

    /**
     * Channel chat to which the message was originally sent
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
     * Optional. Signature of the original post author
     *
     * @var string|null
     */
    protected ?string $authorSignature = null;

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
     * @return void
     *
     * @see $authorSignature
     */
    public function setAuthorSignature(?string $authorSignature): void
    {
        $this->authorSignature = $authorSignature;
    }
}
