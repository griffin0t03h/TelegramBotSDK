<?php

namespace TelegramBotSDK\Enum;

enum PaidMediaType: string
{
    case Preview = 'preview';
    case Photo = 'photo';
    case Video = 'video';
    case Unknown = 'unknown';
}
