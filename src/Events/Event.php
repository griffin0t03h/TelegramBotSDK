<?php

namespace TelegramBotSDK\Events;

use Closure;
use TelegramBotSDK\Types\Update;

class Event
{
    /**
     * @var Closure|null
     */
    protected ?Closure $checker;

    /**
     * @var Closure
     */
    protected Closure $action;

    /**
     * Event constructor.
     *
     * @param Closure $action
     * @param Closure|null $checker
     */
    public function __construct(Closure $action, Closure $checker = null)
    {
        $this->action = $action;
        $this->checker = $checker;
    }

    /**
     * @return Closure
     */
    public function getAction(): Closure
    {
        return $this->action;
    }

    /**
     * @return Closure|null
     */
    public function getChecker(): ?Closure
    {
        return $this->checker;
    }

    /**
     * @param Update $message
     * @return mixed
     */
    public function executeChecker(Update $message): mixed
    {
        if (is_callable($this->checker)) {
            return call_user_func($this->checker, $message);
        }

        return false;
    }

    /**
     * @param Update $message
     * @return mixed
     */
    public function executeAction(Update $message): mixed
    {
        return call_user_func($this->action, $message);
    }
}
