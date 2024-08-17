<?php

namespace TelegramBotSDK\Types\Inline\QueryResult;

use TelegramBotSDK\Types\Inline\InlineKeyboardMarkup;
use TelegramBotSDK\Types\Inline\InputMessageContent;

/**
 * Class Audio
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultaudio
 * Represents a link to an mp3 audio file. By default, this audio file will be sent by the user.
 * Alternatively, you can use InputMessageContent to send a message with the specified content instead of the audio.
 *
 * Note: This will only work in Telegram versions released after 9 April, 2016. Older clients will ignore them.
 *
 * @package TelegramBotSDK\Types\Inline\QueryResult
 */
class Audio extends AbstractInlineQueryResult
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $requiredParams = ['type', 'id', 'audio_url', 'title'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    protected static array $map = [
        'type' => true,
        'id' => true,
        'audio_url' => true,
        'title' => true,
        'performer' => true,
        'audio_duration' => true,
        'reply_markup' => InlineKeyboardMarkup::class,
        'input_message_content' => InputMessageContent::class,
    ];

    /**
     * {@inheritdoc}
     *
     * @var string
     */
    protected string $type = 'audio';

    /**
     * A valid URL for the audio file
     *
     * @var string
     */
    protected string $audioUrl;

    /**
     * Optional. Performer
     *
     * @var string|null
     */
    protected ?string $performer = null;

    /**
     * Optional. Audio duration in seconds
     *
     * @var int|null
     */
    protected ?int $audioDuration = null;

    /**
     * Audio constructor.
     *
     * @param string $id
     * @param string $audioUrl
     * @param string $title
     * @param string|null $performer
     * @param int|null $audioDuration
     * @param InputMessageContent|null $inputMessageContent
     * @param InlineKeyboardMarkup|null $inlineKeyboardMarkup
     */
    public function __construct(
        string $id,
        string $audioUrl,
        string $title,
        ?string $performer = null,
        ?int $audioDuration = null,
        ?InputMessageContent $inputMessageContent = null,
        ?InlineKeyboardMarkup $inlineKeyboardMarkup = null,
    ) {
        parent::__construct($id, $title, $inputMessageContent, $inlineKeyboardMarkup);

        $this->audioUrl = $audioUrl;
        $this->performer = $performer;
        $this->audioDuration = $audioDuration;
    }

    /**
     * @return string
     */
    public function getAudioUrl(): string
    {
        return $this->audioUrl;
    }

    /**
     * @param string $audioUrl
     *
     * @return void
     */
    public function setAudioUrl(string $audioUrl): void
    {
        $this->audioUrl = $audioUrl;
    }

    /**
     * @return string|null
     */
    public function getPerformer(): ?string
    {
        return $this->performer;
    }

    /**
     * @param string|null $performer
     *
     * @return void
     */
    public function setPerformer(?string $performer): void
    {
        $this->performer = $performer;
    }

    /**
     * @return int|null
     */
    public function getAudioDuration(): ?int
    {
        return $this->audioDuration;
    }

    /**
     * @param int|null $audioDuration
     *
     * @return void
     */
    public function setAudioDuration(?int $audioDuration): void
    {
        $this->audioDuration = $audioDuration;
    }
}
