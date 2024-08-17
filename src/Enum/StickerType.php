<?php

namespace TelegramBotSDK\Enum;

enum StickerType: string
{
    case Regular = 'regular';
    case Mask = 'mask';
    case CustomEmoji = 'custom_emoji';
    case Unknown = 'unknown';
}
