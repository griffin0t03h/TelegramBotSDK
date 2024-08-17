<?php

namespace TelegramBotSDK\Types\Payments;

use TelegramBotSDK\Types\Video;

/**
 * Class PaidMediaVideo
 * The paid media is a video.
 *
 * @see https://core.telegram.org/bots/api#paidmediavideo
 *
 * @package TelegramBotSDK\Types\Payments
 */
class PaidMediaVideo extends PaidMedia
{
    /**
     * @var array
     */
    protected static array $requiredParams = ['type', 'video'];

    /**
     * @var array
     */
    protected static array $map = [
        'type' => true,
        'video' => Video::class,
    ];

    /**
     * The video
     *
     * @var Video
     */
    protected Video $video;

    /**
     * @return Video
     */
    public function getVideo(): Video
    {
        return $this->video;
    }

    /**
     * @param Video $video
     * @return void
     */
    public function setVideo(Video $video): void
    {
        $this->video = $video;
    }
}
