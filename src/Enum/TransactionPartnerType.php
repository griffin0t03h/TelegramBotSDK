<?php

namespace TelegramBotSDK\Enum;

enum TransactionPartnerType: string
{
    case User = 'user';
    case Fragment = 'fragment';
    case TelegramAds = 'telegram_ads';
    case Other = 'other';
    case Unknown = 'unknown';
}
