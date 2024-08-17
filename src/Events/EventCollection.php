<?php

namespace TelegramBotSDK\Events;

use Closure;
use TelegramBotSDK\Types\Update;

class EventCollection
{
    /**
     * Array of events.
     *
     * @var array
     */
    protected array $events = [];

    /**
     * Add new event to collection
     *
     * @param Closure $event
     * @param Closure|null $checker
     *
     * @return EventCollection
     */
    public function add(Closure $event, Closure $checker = null): EventCollection
    {
        $this->events[] = !is_null($checker) ? new Event($event, $checker)
            : new Event($event, function () {
            });

        return $this;
    }

    /**
     * @param Update $update
     * @return void
     */
    public function handle(Update $update): void
    {
        foreach ($this->events as $event) {
            /* @var Event $event */
            if ($event->executeChecker($update) === true) {
                if ($event->executeAction($update) === false) {
                    break;
                }
            }
        }
    }
}
