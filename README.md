# PHP Telegram Bot Api

[![Latest Version on Packagist](https://img.shields.io/packagist/v/griffin0t03h/telegram-bot-sdk.svg?style=flat-square)](https://packagist.org/packages/griffin0t03h/telegram-bot-sdk)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](licenses/LICENSE.txt)
[![Total Downloads](https://img.shields.io/packagist/dt/griffin0t03h/telegram-bot-sdk.svg?style=flat-square)](https://packagist.org/packages/griffin0t03h/telegram-bot-sdk)

An extended native php wrapper for [Telegram Bot API](https://core.telegram.org/bots/api) without requirements. Supports all methods and types of responses.

## Bots: An introduction for developers
>Bots are special Telegram accounts designed to handle messages automatically. Users can interact with bots by sending them command messages in private or group chats.

>You control your bots using HTTPS requests to [bot API](https://core.telegram.org/bots/api).

>The Bot API is an HTTP-based interface created for developers keen on building bots for Telegram.
To learn how to create and set up a bot, please consult [Introduction to Bots](https://core.telegram.org/bots) and [Bot FAQ](https://core.telegram.org/bots/faq).

## Installation

Via Composer

``` bash
$ composer require telegram-bot-sdk/api
```

### API Wrapper
#### Send message
``` php
$bot = new \TelegramBotSDK\Api\BotApi('YOUR_BOT_API_TOKEN');

$bot->sendMessage($chatId, $messageText);
```

#### Send document
```php
$bot = new \TelegramBotSDK\Api\BotApi('YOUR_BOT_API_TOKEN');

$document = new \CURLFile('document.txt');
$bot->getContentService()->sendDocument($chatId, $document);
```

#### Send message with reply keyboard
```php
$bot = new \TelegramBotSDK\Api\BotApi('YOUR_BOT_API_TOKEN');

$keyboard = new \TelegramBotSDK\Types\ReplyKeyboardMarkup(array(array("one", "two", "three")), true); // true for one-time keyboard
$bot->sendMessage($chatId, $messageText, replyMarkup: $keyboard);
```

#### Send message with inline keyboard
```php
$bot = new \TelegramBotSDK\Api\BotApi('YOUR_BOT_API_TOKEN');

$keyboard = new \TelegramBotSDK\Types\Inline\InlineKeyboardMarkup(
            [
                [
                    ['text' => 'link', 'url' => 'https://core.telegram.org']
                ]
            ]
        );
$bot->sendMessage($chatId, $messageText, replyMarkup: $keyboard);
```

#### Send media group
```php
$bot = new \TelegramBotSDK\Api\BotApi('YOUR_BOT_API_TOKEN');

$media = new \TelegramBotSDK\Types\InputMedia\ArrayOfInputMedia();
$media->addItem(new TelegramBotSDK\Types\InputMedia\InputMediaPhoto('photo_url'));
$media->addItem(new TelegramBotSDK\Types\InputMedia\InputMediaPhoto('photo_url'));
// Same for video
// $media->addItem(new TelegramBotSDK\Types\InputMedia\InputMediaVideo('video_url'));
$bot->getContentService()->sendMediaGroup($chatId, $media);
```

#### Client
```php
require_once "vendor/autoload.php";

try {
    $bot = new \TelegramBotSDK\Client('YOUR_BOT_API_TOKEN');

    //Handle /ping command
    $bot->command('ping', function ($message) use ($bot) {
        $bot->sendMessage($message->getChat()->getId(), 'pong!');
    });
    
    //Handle text messages
    $bot->on(function (\TelegramBotSDK\Types\Update $update) use ($bot) {
        $message = $update->getMessage();
        $id = $message->getChat()->getId();
        $bot->sendMessage($id, 'Your message: ' . $message->getText());
    }, function () {
        return true;
    });
    
    $bot->run();

} catch (\TelegramBotSDK\Exception $e) {
    $e->getMessage();
}
```

#### Local Bot API Server

For using custom [local bot API server](https://core.telegram.org/bots/api#using-a-local-bot-api-server)

```php
use TelegramBotSDK\Client;

$token = 'YOUR_BOT_API_TOKEN';
$bot = new Client($token);
```

#### Third-party Http Client

```php
use TelegramBotSDK\Client;
use TelegramBotSDK\Http\SymfonyHttpClient;
use Symfony\Component\HttpClient\HttpClient;

$token = 'YOUR_BOT_API_TOKEN';
$bot = new Client($token, new SymfonyHttpClient(HttpClient::create()));
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Third-Party Licenses

This project also includes code from the following third-party projects:

- **[Library Name](https://github.com/TelegramBot/Api)**: Licensed under the [Library License](licenses/Api-IlyaGusev-LICENSE.txt).
