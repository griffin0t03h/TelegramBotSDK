<?php

namespace TelegramBotSDK\Enum;

enum ChatBoostSource: string
{
    case Premium = 'premium';
    case GiftCode = 'gift_code';
    case Giveaway = 'giveaway';
    case Unknown = 'unknown';
}
