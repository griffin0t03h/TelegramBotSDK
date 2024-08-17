<?php

namespace TelegramBotSDK\Enum;

enum ChatType: string
{
    case Private = 'private';
    case Group = 'group';
    case Supergroup = 'supergroup';
    case Channel = 'channel';
    case Unknown = 'unknown';
}
