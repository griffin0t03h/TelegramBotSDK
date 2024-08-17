<?php

namespace TelegramBotSDK\Types;

/**
 * Class MessageOriginChat
 * The message was originally sent on behalf of a chat to a group chat.
 *
 * @package TelegramBotSDK\Types
 */
class MessageOriginChat extends MessageOrigin
{
    protected static array $requiredParams = ['type', 'date', 'sender_chat'];

    protected static array $map = [
        'type' => true,
        'date' => true,
        'sender_chat' => Chat::class,
        'author_signature' => true,
    ];

    /**
     * Chat that sent the message originally
     *
     * @var Chat
     */
    protected Chat $senderChat;

    /**
     * Optional. For messages originally sent by an anonymous chat administrator, original message author signature
     *
     * @var string|null
     */
    protected ?string $authorSignature = null;

    /**
     * @return Chat
     *
     * @see $senderChat
     */
    public function getSenderChat(): Chat
    {
        return $this->senderChat;
    }

    /**
     * @param Chat $senderChat
     * @return void
     *
     * @see $senderChat
     */
    public function setSenderChat(Chat $senderChat): void
    {
        $this->senderChat = $senderChat;
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
