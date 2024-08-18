<?php

namespace TelegramBotSDK\Types;

use TelegramBotSDK\Enum\ReactionTypeEnum;

/**
 * Class ReactionTypePaid
 * The reaction is paid.
 *
 * @package TelegramBotSDK
 */
class ReactionTypePaid extends ReactionType
{

    /**
     * {@inheritdoc}
     *
     * @var ReactionTypeEnum
     */
    protected ReactionTypeEnum $type = ReactionTypeEnum::Paid;
}
