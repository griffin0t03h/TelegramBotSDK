<?php

namespace TelegramBotSDK\Enum;

enum InputMediaType: string
{
    case Animation = 'animation';
    case Document = 'document';
    case Audio = 'audio';
    case Photo = 'photo';
    case Video = 'video';
    case Unknown = 'unknown';
}
