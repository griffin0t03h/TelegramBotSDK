<?php

namespace TelegramBotSDK\Enum;

enum ChatMemberStatus: string
{
    case Creator = 'creator';
    case Administrator = 'administrator';
    case Member = 'member';
    case Restricted = 'restricted';
    case Left = 'left';
    case Kicked = 'kicked';
    case Unknown = 'unknown';
}
