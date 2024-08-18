<?php

namespace TelegramBotSDK\Enum;

enum ReactionTypeEnum: string
{
    case Emoji = 'emoji';
    case CustomEmoji = 'custom_emoji';
    case Paid = 'paid';
    case Unknown = 'unknown';
}
