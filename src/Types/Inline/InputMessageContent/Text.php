<?php

namespace TelegramBotSDK\Types\Inline\InputMessageContent;

use TelegramBotSDK\TypeInterface;
use TelegramBotSDK\Types\ArrayOfMessageEntity;
use TelegramBotSDK\Types\Inline\InputMessageContent;
use TelegramBotSDK\Types\LinkPreviewOptions;

/**
 * Class Text
 * @see https://core.telegram.org/bots/api#inputtextmessagecontent
 * Represents the content of a text message to be sent as the result of an inline query.
 *
 * @package TelegramBotSDK\Types\Inline\InputMessageContent
 */
class Text extends InputMessageContent implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['message_text'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'message_text' => true,
        'parse_mode' => true,
        'entities' => ArrayOfMessageEntity::class,
        'link_preview_options' => LinkPreviewOptions::class,
    ];

    /**
     * Text of the message to be sent, 1-4096 characters
     *
     * @var string
     */
    protected string $messageText;

    /**
     * Optional. Send Markdown or HTML,
     * if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in your bot's message.
     *
     * @var string|null
     */
    protected ?string $parseMode = null;

    /**
     * Link preview generation options for the message
     *
     * @var LinkPreviewOptions|null
     */
    protected ?LinkPreviewOptions $linkPreviewOptions = null;

    /**
     * Text constructor.
     *
     * @param string $messageText
     * @param string|null $parseMode
     * @param LinkPreviewOptions|null $linkPreviewOptions Link preview generation options for the message.
     */
    public function __construct(
        string $messageText,
        string $parseMode = null,
        LinkPreviewOptions $linkPreviewOptions = null,
    ) {
        $this->messageText = $messageText;
        $this->parseMode = $parseMode;
        $this->linkPreviewOptions = $linkPreviewOptions;
    }

    /**
     * @return string
     */
    public function getMessageText(): string
    {
        return $this->messageText;
    }

    /**
     * @param string $messageText
     *
     * @return void
     */
    public function setMessageText(string $messageText): void
    {
        $this->messageText = $messageText;
    }

    /**
     * @return string|null
     */
    public function getParseMode(): ?string
    {
        return $this->parseMode;
    }

    /**
     * @param string|null $parseMode
     *
     * @return void
     */
    public function setParseMode(?string $parseMode): void
    {
        $this->parseMode = $parseMode;
    }

    /**
     * @return LinkPreviewOptions|null
     */
    public function getLinkPreviewOptions(): ?LinkPreviewOptions
    {
        return $this->linkPreviewOptions;
    }

    /**
     * @param LinkPreviewOptions|null $linkPreviewOptions
     * @return void
     */
    public function setLinkPreviewOptions(?LinkPreviewOptions $linkPreviewOptions): void
    {
        $this->linkPreviewOptions = $linkPreviewOptions;
    }
}
