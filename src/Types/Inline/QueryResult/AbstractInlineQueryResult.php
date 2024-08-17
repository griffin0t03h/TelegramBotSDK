<?php

namespace TelegramBotSDK\Types\Inline\QueryResult;

use TelegramBotSDK\BaseType;
use TelegramBotSDK\Types\Inline\InlineKeyboardMarkup;
use TelegramBotSDK\Types\Inline\InputMessageContent;

/**
 * Class AbstractInlineQueryResult
 * Abstract class for representing one result of an inline query
 *
 * @package TelegramBotSDK\Types
 */
class AbstractInlineQueryResult extends BaseType
{
    /**
     * Type of the result, must be one of: article, photo, gif, mpeg4_gif, video
     *
     * @var string
     */
    protected string $type;

    /**
     * Unique identifier for this result, 1-64 bytes
     *
     * @var string
     */
    protected string $id;

    /**
     * Title for the result
     *
     * @var string|null
     */
    protected ?string $title = null;

    /**
     * Content of the message to be sent instead of the file
     *
     * @var InputMessageContent|null
     */
    protected ?InputMessageContent $inputMessageContent = null;

    /**
     * Optional. Inline keyboard attached to the message
     *
     * @var InlineKeyboardMarkup|null
     */
    protected ?InlineKeyboardMarkup $replyMarkup = null;

    /**
     * AbstractInlineQueryResult constructor.
     *
     * @param string $id
     * @param string|null $title
     * @param InputMessageContent|null $inputMessageContent
     * @param InlineKeyboardMarkup|null $replyMarkup
     */
    public function __construct(string $id, string $title = null, InputMessageContent $inputMessageContent = null, InlineKeyboardMarkup $replyMarkup = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->inputMessageContent = $inputMessageContent;
        $this->replyMarkup = $replyMarkup;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return void
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

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
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return void
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return InputMessageContent|null
     */
    public function getInputMessageContent(): ?InputMessageContent
    {
        return $this->inputMessageContent;
    }

    /**
     * @param InputMessageContent|null $inputMessageContent
     * @return void
     */
    public function setInputMessageContent(?InputMessageContent $inputMessageContent): void
    {
        $this->inputMessageContent = $inputMessageContent;
    }

    /**
     * @return InlineKeyboardMarkup|null
     */
    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->replyMarkup;
    }

    /**
     * @param InlineKeyboardMarkup|null $replyMarkup
     * @return void
     */
    public function setReplyMarkup(?InlineKeyboardMarkup $replyMarkup): void
    {
        $this->replyMarkup = $replyMarkup;
    }
}
