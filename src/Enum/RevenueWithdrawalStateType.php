<?php

namespace TelegramBotSDK\Enum;

enum RevenueWithdrawalStateType: string
{
    case Pending = 'pending';
    case Succeeded = 'succeeded';
    case Failed = 'failed';
    case Unknown = 'unknown';
}
