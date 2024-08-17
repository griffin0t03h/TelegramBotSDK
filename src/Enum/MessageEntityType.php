<?php

namespace TelegramBotSDK\Enum;

enum MessageEntityType: string
{
    /**
     * sample: @username
     */
    case Mention = 'mention';

    /**
     * sample: #hashtag
     */
    case Hashtag = 'hashtag';

    /**
     * sample: $cashtag
     */
    case Cashtag = 'cashtag';

    /**
     * sample: /start@jobs_bot
     */
    case BotCommand = 'bot_command';

    /**
     * sample: https://telegram.org
     */
    case Url = 'url';

    /**
     * sample: do-not-reply@telegram.org
     */
    case Email = 'email';

    /**
     * sample: +1-212-555-0123
     */
    case phone_number = 'phone_number';

    /**
     *
     * sample: **bold text**
     */
    case Bold = 'bold';

    /**
     * sample: _italic text_
     */
    case Italic = 'italic';

    /**
     * underline text
     */
    case Underline = 'underline';

    /**
     * strikethrough text
     */
    case StrikeThrough = 'strikethrough';

    /**
     * spoiler message
     */
    case Spoiler = 'spoiler';

    /**
     * block quotation
     */
    case BlockQuote = 'blockquote';

    /**
     * collapsed-by-default block quotation
     */
    case ExpandableBlockQuote = 'expandable_blockquote';

    /**
     * monowidth string
     */
    case Code = 'code';

    /**
     * monowidth block
     */
    case Pre = 'pre';

    /**
     * for clickable text URLs
     */
    case TextLink = 'text_link';

    /**
     * for users [without usernames](https://telegram.org/blog/edit#new-mentions)
     */
    case TextMention = 'text_mention';

    /**
     * for inline custom emoji stickers
     */
    case CustomEmoji = 'custom_emoji';

    case Unknown = 'unknown';
}
