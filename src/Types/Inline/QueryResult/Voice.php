<?php

namespace TelegramBotSDK\Types\Inline\QueryResult;

use TelegramBotSDK\Types\Inline\InlineKeyboardMarkup;
use TelegramBotSDK\Types\Inline\InputMessageContent;

/**
 * Class Voice
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultvoice
 * Represents a link to an mp3 audio file. By default, this audio file will be sent by the user.
 * Alternatively, you can use InputMessageContent to send a message with the specified content instead of the audio.
 *
 * Note: This will only work in Telegram versions released after 9 April, 2016. Older clients will ignore them.
 *
 * @package TelegramBotSDK\Types\Inline\QueryResult
 */
class Voice extends AbstractInlineQueryResult
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['type', 'id', 'voice_url', 'title'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'type' => true,
        'id' => true,
        'voice_url' => true,
        'title' => true,
        'voice_duration' => true,
        'reply_markup' => InlineKeyboardMarkup::class,
        'input_message_content' => InputMessageContent::class,
    ];

    /**
     * {@inheritdoc}
     *
     * @var string
     */
    protected string $type = 'voice';

    /**
     * A valid URL for the audio file
     *
     * @var string
     */
    protected string $voiceUrl;

    /**
     * Optional. Audio duration in seconds
     *
     * @var int|null
     */
    protected ?int $voiceDuration = null;

    /**
     * Voice constructor
     *
     * @param string $id
     * @param string $voiceUrl
     * @param string $title
     * @param int|null $voiceDuration
     * @param InlineKeyboardMarkup|null $inlineKeyboardMarkup
     * @param InputMessageContent|null $inputMessageContent
     */
    public function __construct(
        string $id,
        string $voiceUrl,
        string $title,
        ?int $voiceDuration = null,
        ?InlineKeyboardMarkup $inlineKeyboardMarkup = null,
        ?InputMessageContent $inputMessageContent = null,
    ) {
        parent::__construct($id, $title, $inputMessageContent, $inlineKeyboardMarkup);

        $this->voiceUrl = $voiceUrl;
        $this->voiceDuration = $voiceDuration;
        $this->replyMarkup = $inlineKeyboardMarkup;
        $this->inputMessageContent = $inputMessageContent;
    }

    /**
     * @return string
     */
    public function getVoiceUrl(): string
    {
        return $this->voiceUrl;
    }

    /**
     * @param string $voiceUrl
     *
     * @return void
     */
    public function setVoiceUrl(string $voiceUrl): void
    {
        $this->voiceUrl = $voiceUrl;
    }

    /**
     * @return int|null
     */
    public function getVoiceDuration(): ?int
    {
        return $this->voiceDuration;
    }

    /**
     * @param int|null $voiceDuration
     *
     * @return void
     */
    public function setVoiceDuration(?int $voiceDuration): void
    {
        $this->voiceDuration = $voiceDuration;
    }
}
