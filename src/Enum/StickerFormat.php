<?php

namespace TelegramBotSDK\Enum;

enum StickerFormat: string
{
    /**
     * for a .WEBP or .PNG image
     */
    case Static = 'static';
    /**
     * for a .TGS animation
     */
    case Animated = 'animated';
    /**
     * for a WEBM video
     */
    case Video = 'video';
}
