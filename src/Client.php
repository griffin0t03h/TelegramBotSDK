<?php

namespace TelegramBotSDK;

use Closure;
use ReflectionFunction;
use TelegramBotSDK\Api\BotApi;
use TelegramBotSDK\Api\Service\BaseService;
use TelegramBotSDK\Events\EventCollection;
use TelegramBotSDK\Http\HttpClientInterface;
use TelegramBotSDK\Types\Update;

/**
 * Class Client
 *
 * @package TelegramBotSDK
 */
class Client
{
    /**
     * RegExp for bot commands
     */
    const REGEXP = '/^(?:@\w+\s)?\/([^\s@]+)(@\S+)?\s?(.*)$/';

    /**
     * @var BotApi
     */
    protected BotApi $api;

    /**
     * @var EventCollection
     */
    protected EventCollection $events;

    /**
     * Client constructor
     *
     * @param string $token Telegram Bot API token
     * @param HttpClientInterface|null $httpClient
     * @param string|null $endpoint
     */
    public function __construct(
        string $token,
        HttpClientInterface $httpClient = null,
        string $endpoint = null,
    ) {
        $this->api = new BotApi($token, $httpClient, $endpoint);
        $this->events = new EventCollection();
    }

    /**
     * Use this method to add command. Parameters will be automatically parsed and passed to closure.
     *
     * @param string $name
     * @param Closure $action
     *
     * @return Client
     */
    public function command(string $name, Closure $action): Client
    {
        return $this->on(self::getEvent($action), self::getChecker($name));
    }

    /**
     * Use this method to add an event.
     * If second closure will return true (or if you are passed null instead of closure), first one will be executed.
     *
     * @param Closure $event
     * @param Closure|null $checker
     *
     * @return Client
     */
    public function on(Closure $event, Closure $checker = null): Client
    {
        $this->events->add($event, $checker);

        return $this;
    }

    /**
     * Returns event function to handling the command.
     *
     * @param Closure $action
     *
     * @return Closure
     */
    protected static function getEvent(Closure $action): Closure
    {
        return function (Update $update) use ($action) {
            $message = $update->getMessage();
            if (!$message) {
                return true;
            }

            preg_match(self::REGEXP, (string) $message->getText(), $matches);

            if (!empty($matches[3])) {
                $parameters = str_getcsv($matches[3], chr(32));
            } else {
                $parameters = [];
            }

            array_unshift($parameters, $message);

            $action = new ReflectionFunction($action);

            if (count($parameters) >= $action->getNumberOfRequiredParameters()) {
                $action->invokeArgs($parameters);
            }

            return false;
        };
    }

    /**
     * Returns check function to handling the command.
     *
     * @param string $name
     *
     * @return Closure
     */
    protected static function getChecker(string $name): Closure
    {
        return function (Update $update) use ($name) {
            $message = $update->getMessage();
            if (!$message) {
                return false;
            }
            $text = $message->getText();
            if (empty($text)) {
                return false;
            }

            preg_match(self::REGEXP, $text, $matches);

            return !empty($matches) && $matches[1] == $name;
        };
    }

    /**
     * @param Closure $action
     * @return Client
     */
    public function editedMessage(Closure $action): Client
    {
        return $this->on(self::getEditedMessageEvent($action), self::getEditedMessageChecker());
    }

    /**
     * @param Closure $action
     * @return Closure
     */
    protected static function getEditedMessageEvent(Closure $action): Closure
    {
        return function (Update $update) use ($action) {
            if (!$update->getEditedMessage()) {
                return true;
            }

            $reflectionAction = new ReflectionFunction($action);
            $reflectionAction->invokeArgs([$update->getEditedMessage()]);
            return false;
        };
    }

    /**
     * Returns check function to handling the edited message.
     *
     * @return Closure
     */
    protected static function getEditedMessageChecker(): Closure
    {
        return function (Update $update) {
            return !is_null($update->getEditedMessage());
        };
    }

    /**
     * @param Closure $action
     * @return Client
     */
    public function callbackQuery(Closure $action): Client
    {
        return $this->on(self::getCallbackQueryEvent($action), self::getCallbackQueryChecker());
    }

    /**
     * @param Closure $action
     * @return Closure
     */
    protected static function getCallbackQueryEvent(Closure $action): Closure
    {
        return function (Update $update) use ($action) {
            if (!$update->getCallbackQuery()) {
                return true;
            }

            $reflectionAction = new ReflectionFunction($action);
            $reflectionAction->invokeArgs([$update->getCallbackQuery()]);
            return false;
        };
    }

    /**
     * Returns check function to handling the callbackQuery.
     *
     * @return Closure
     */
    protected static function getCallbackQueryChecker(): Closure
    {
        return function (Update $update) {
            return !is_null($update->getCallbackQuery());
        };
    }

    /**
     * @param Closure $action
     * @return Client
     */
    public function channelPost(Closure $action): Client
    {
        return $this->on(self::getChannelPostEvent($action), self::getChannelPostChecker());
    }

    /**
     * @param Closure $action
     * @return Closure
     */
    protected static function getChannelPostEvent(Closure $action): Closure
    {
        return function (Update $update) use ($action) {
            if (!$update->getChannelPost()) {
                return true;
            }

            $reflectionAction = new ReflectionFunction($action);
            $reflectionAction->invokeArgs([$update->getChannelPost()]);
            return false;
        };
    }

    /**
     * Returns check function to handling the channel post.
     *
     * @return Closure
     */
    protected static function getChannelPostChecker(): Closure
    {
        return function (Update $update) {
            return !is_null($update->getChannelPost());
        };
    }

    /**
     * @param Closure $action
     * @return Client
     */
    public function editedChannelPost(Closure $action): Client
    {
        return $this->on(self::getEditedChannelPostEvent($action), self::getEditedChannelPostChecker());
    }

    /**
     * @param Closure $action
     * @return Closure
     */
    protected static function getEditedChannelPostEvent(Closure $action): Closure
    {
        return function (Update $update) use ($action) {
            if (!$update->getEditedChannelPost()) {
                return true;
            }

            $reflectionAction = new ReflectionFunction($action);
            $reflectionAction->invokeArgs([$update->getEditedChannelPost()]);
            return false;
        };
    }

    /**
     * Returns check function to handling the edited channel post.
     *
     * @return Closure
     */
    protected static function getEditedChannelPostChecker(): Closure
    {
        return function (Update $update) {
            return !is_null($update->getEditedChannelPost());
        };
    }

    /**
     * @param Closure $action
     * @return Client
     */
    public function inlineQuery(Closure $action): Client
    {
        return $this->on(self::getInlineQueryEvent($action), self::getInlineQueryChecker());
    }

    /**
     * @param Closure $action
     * @return Closure
     */
    protected static function getInlineQueryEvent(Closure $action): Closure
    {
        return function (Update $update) use ($action) {
            if (!$update->getInlineQuery()) {
                return true;
            }

            $reflectionAction = new ReflectionFunction($action);
            $reflectionAction->invokeArgs([$update->getInlineQuery()]);
            return false;
        };
    }

    /**
     * Returns check function to handling the inline queries.
     *
     * @return Closure
     */
    protected static function getInlineQueryChecker(): Closure
    {
        return function (Update $update) {
            return !is_null($update->getInlineQuery());
        };
    }

    /**
     * @param Closure $action
     * @return Client
     */
    public function chosenInlineResult(Closure $action): Client
    {
        return $this->on(self::getChosenInlineResultEvent($action), self::getChosenInlineResultChecker());
    }

    /**
     * @param Closure $action
     * @return Closure
     */
    protected static function getChosenInlineResultEvent(Closure $action): Closure
    {
        return function (Update $update) use ($action) {
            if (!$update->getChosenInlineResult()) {
                return true;
            }

            $reflectionAction = new ReflectionFunction($action);
            $reflectionAction->invokeArgs([$update->getChosenInlineResult()]);
            return false;
        };
    }

    /**
     * Returns check function to handling the chosen inline result.
     *
     * @return Closure
     */
    protected static function getChosenInlineResultChecker(): Closure
    {
        return function (Update $update) {
            return !is_null($update->getChosenInlineResult());
        };
    }

    /**
     * @param Closure $action
     * @return Client
     */
    public function shippingQuery(Closure $action): Client
    {
        return $this->on(self::getShippingQueryEvent($action), self::getShippingQueryChecker());
    }

    /**
     * @param Closure $action
     * @return Closure
     */
    protected static function getShippingQueryEvent(Closure $action): Closure
    {
        return function (Update $update) use ($action) {
            if (!$update->getShippingQuery()) {
                return true;
            }

            $reflectionAction = new ReflectionFunction($action);
            $reflectionAction->invokeArgs([$update->getShippingQuery()]);
            return false;
        };
    }

    /**
     * Returns check function to handling the shipping queries.
     *
     * @return Closure
     */
    protected static function getShippingQueryChecker(): Closure
    {
        return function (Update $update) {
            return !is_null($update->getShippingQuery());
        };
    }

    /**
     * @param Closure $action
     * @return Client
     */
    public function preCheckoutQuery(Closure $action): Client
    {
        return $this->on(self::getPreCheckoutQueryEvent($action), self::getPreCheckoutQueryChecker());
    }

    /**
     * @param Closure $action
     * @return Closure
     */
    protected static function getPreCheckoutQueryEvent(Closure $action): Closure
    {
        return function (Update $update) use ($action) {
            if (!$update->getPreCheckoutQuery()) {
                return true;
            }

            $reflectionAction = new ReflectionFunction($action);
            $reflectionAction->invokeArgs([$update->getPreCheckoutQuery()]);
            return false;
        };
    }

    /**
     * Returns check function to handling the pre checkout queries.
     *
     * @return Closure
     */
    protected static function getPreCheckoutQueryChecker(): Closure
    {
        return function (Update $update) {
            return !is_null($update->getPreCheckoutQuery());
        };
    }

    /**
     * Webhook handler
     *
     * @return void
     * @throws InvalidJsonException|InvalidArgumentException
     */
    public function run(): void
    {
        if ($data = BaseService::jsonValidate((string) $this->getRawBody(), true)) {
            /** @var array $data */
            $this->handle([Update::fromResponse($data)]);
        }
    }

    /**
     * @return false|string
     */
    public function getRawBody(): bool|string
    {
        return file_get_contents('php://input');
    }

    /**
     * Handle updates
     *
     * @param Update[] $updates
     * @return void
     */
    public function handle(array $updates): void
    {
        foreach ($updates as $update) {
            $this->events->handle($update);
        }
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     * @throws BadMethodCallException
     */
    public function __call(string $name, array $arguments)
    {
        if (method_exists($this, $name)) {
            return call_user_func_array([$this, $name], $arguments);
        } elseif (method_exists($this->api, $name)) {
            return call_user_func_array([$this->api, $name], $arguments);
        }
        throw new BadMethodCallException("Method $name not exists");
    }
}
