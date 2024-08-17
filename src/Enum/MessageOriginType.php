<?php

namespace TelegramBotSDK\Enum;

enum MessageOriginType: string
{
    case User = 'user';
    case HiddenUser = 'hidden_user';
    case Chat = 'chat';
    case Channel = 'channel';
    case Unknown = 'unknown';
}
