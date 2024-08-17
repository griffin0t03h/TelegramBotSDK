<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\TypeInterface;

/**
 * Class ReplyParameters
 * Describes reply parameters for the message that is being sent.
 *
 * @package TelegramBotSDK\Types
 */
class ReplyParameters extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['message_id'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'message_id' => true,
        'chat_id' => true,
        'allow_sending_without_reply' => true,
        'quote' => true,
        'quote_parse_mode' => true,
        'quote_entities' => ArrayOfMessageEntity::class,
        'quote_position' => true,
    ];

    /**
     * Identifier of the message that will be replied to in the current chat, or in the chat chat_id if it is specified
     *
     * @var int
     */
    protected int $messageId;

    /**
     * Optional. If the message to be replied to is from a different chat, unique identifier for the chat or username
     * of the channel (in the format @channelusername). Not supported for messages sent on behalf of a business
     * account.
     *
     * @var int|string|null
     */
    protected string|int|null $chatId;

    /**
     * Optional. Pass True if the message should be sent even if the specified message to be replied to is not found.
     * Always False for replies in another chat or forum topic. Always True for messages sent on behalf of a business
     * account.
     *
     * @var bool|null
     */
    protected ?bool $allowSendingWithoutReply = null;

    /**
     * Optional. Quoted part of the message to be replied to; 0-1024 characters after entities parsing. The quote must
     * be an exact substring of the message to be replied to, including bold, italic, underline, strikethrough,
     * spoiler, and custom_emoji entities. The message will fail to send if the quote isn't found in the original
     * message.
     *
     * @var string|null
     */
    protected ?string $quote = null;

    /**
     * Optional. Mode for parsing entities in the quote. See formatting options for more details.
     *
     * @var string|null
     */
    protected ?string $quoteParseMode = null;

    /**
     * Optional. A JSON-serialized list of special entities that appear in the quote. It can be specified instead of
     * quote_parse_mode.
     *
     * @var ArrayOfMessageEntity|null
     */
    protected ?ArrayOfMessageEntity $quoteEntities = null;

    /**
     * Optional. Position of the quote in the original message in UTF-16 code units
     *
     * @var int|null
     */
    protected ?int $quotePosition = null;

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
     * @return int|string|null
     *
     * @see $chatId
     */
    public function getChatId(): int|string|null
    {
        return $this->chatId;
    }

    /**
     * @param int|string|null $chatId
     * @return void
     *
     * @see $chatId
     */
    public function setChatId(int|string|null $chatId): void
    {
        $this->chatId = $chatId;
    }

    /**
     * @return bool|null
     *
     * @see $allowSendingWithoutReply
     */
    public function getAllowSendingWithoutReply(): ?bool
    {
        return $this->allowSendingWithoutReply;
    }

    /**
     * @param bool|null $allowSendingWithoutReply
     * @return void
     *
     * @see $allowSendingWithoutReply
     */
    public function setAllowSendingWithoutReply(?bool $allowSendingWithoutReply): void
    {
        $this->allowSendingWithoutReply = $allowSendingWithoutReply;
    }

    /**
     * @return string|null
     *
     * @see $quote
     */
    public function getQuote(): ?string
    {
        return $this->quote;
    }

    /**
     * @param string|null $quote
     * @return void
     *
     * @see $quote
     */
    public function setQuote(?string $quote): void
    {
        $this->quote = $quote;
    }

    /**
     * @return string|null
     *
     * @see $quoteParseMode
     */
    public function getQuoteParseMode(): ?string
    {
        return $this->quoteParseMode;
    }

    /**
     * @param string|null $quoteParseMode
     * @return void
     *
     * @see $quoteParseMode
     */
    public function setQuoteParseMode(?string $quoteParseMode): void
    {
        $this->quoteParseMode = $quoteParseMode;
    }

    /**
     * @return ArrayOfMessageEntity|null
     *
     * @see $quoteEntities
     */
    public function getQuoteEntities(): ?ArrayOfMessageEntity
    {
        return $this->quoteEntities;
    }

    /**
     * @param ArrayOfMessageEntity|null $quoteEntities
     * @return void
     *
     * @see $quoteEntities
     */
    public function setQuoteEntities(?ArrayOfMessageEntity $quoteEntities): void
    {
        $this->quoteEntities = $quoteEntities;
    }

    /**
     * @return int|null
     *
     * @see $quotePosition
     */
    public function getQuotePosition(): ?int
    {
        return $this->quotePosition;
    }

    /**
     * @param int|null $quotePosition
     * @return void
     *
     * @see $quotePosition
     */
    public function setQuotePosition(?int $quotePosition): void
    {
        $this->quotePosition = $quotePosition;
    }
}
